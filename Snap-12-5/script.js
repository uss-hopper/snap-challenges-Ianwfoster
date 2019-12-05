const axios = require('axios');

async function callDogApi() {
	const configAPI = {
		method: 'get',
		getElementById : "h2"
	}
	let target = await axios(configAPI)
}