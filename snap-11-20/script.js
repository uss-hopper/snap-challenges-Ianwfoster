//write a function that takes an array of numbers, and returns another array that counts the number of times each number appears in the arra

function sumUniquePositiveFactors(number) {
	let sum = 0;
	for (i=1; i<number; i++){
		if(number % i === 0 ) {
			sum = sum + i;
		}
	}
	return sum;
}

const numbers = "1, 2, 3, ,4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20";

