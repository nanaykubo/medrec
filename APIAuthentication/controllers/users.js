const JWT = require('jsonwebtoken');
const User = require('../models/user');
const { JWT_SECRET } = require('../configuration');

signToken = user => {
	return JWT.sign({
		iss: 'Auth',
		sub: user.id,
		iat: new Date().getTime(),
		exp: new Date().getTime() + 86400000
	}, JWT_SECRET);
}

module.exports = {
	signUp: async(req, res, next) => {
		// Email & Password
		const { email, password} = req.value.body;

		// Check if there is a user with the same email
		const foundUser = await User.findOne({ email });
		if( foundUser ) { 
			return res.status(403).json({ error: 'Email is already in used'});
		}

		// Create a new user
		const newUser = new User({ email, password });
		await newUser.save();

		// Generate the token
		const token = signToken(newUser);

		// Respond with token
		res.status(200).json({ token });
	},

	signIn: async(req, res, next) => {
		// Generate token
		const token = signToken(req.user);
		res.status(200).json({ token });
	},

	secret: async(req, res, next) => {
		res.json({ secret: "resource"});
	}
}