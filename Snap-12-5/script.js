// const axios = require('axios');
//
// async function callDogApi() {
// 	const configAPI = {
// 		getElementById : "h2"
// 	}
// 	let target = await axios(configAPI)
// 	console.log(target.status)
// }


const axios = require('axios');

async function makeRequest() {

	const config = {
		method: 'get',
		url: "https://images.dog.ceo/breeds/germanshepherd/n02106662_7168.jpg"
	}

	let target = await axios(config)

	console.log(target.status);
}

makeRequest();