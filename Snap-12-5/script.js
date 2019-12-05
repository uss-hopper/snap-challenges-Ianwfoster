// const axios = require('axios');
//
// async function callDogApi() {
// 	const configAPI = {
// 		getElementById : "h2"
// 	}
// 	let target = await axios(configAPI)
// 	console.log(target.status)
// }
//

// const axios = require('axios');
//
// async function makeRequest() {
//
// 	const config = {
// 		method: 'get',
// 		url: "https://images.dog.ceo/breeds/germanshepherd/n02106662_7168.jpg"
// 	}
//
// 	let target = await axios(config)
//
//
// }
//
// makeRequest(target.status);



const onPageLoad = ()=> {
	axios.get('https://dog.ceo/api/breeds/list/all').then(({data}) =>{
		let breeds= data.message;
		let dogs = ' ';
		for(let breed in breeds) {
			dogs = dogs + '<div>' + breed + '</div>';
		}
		let html = document.getElementById("target");
		html.innerHTML = dogs;
		});
}





