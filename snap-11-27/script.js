//const arrSum = arr => arr.reduce((1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765, 10946, 17711, 28657, 46368, 75025, 121393, 196418, 317811) => a = b, 0;)
const array = [1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765, 10946, 17711, 28657, 46368, 75025, 121393, 196418, 317811];

let sum = array.reduce(function((accumulator, currentValue)) {

	return accumulator + currentValue;
});

// const words = ["Deflector", "power", "at", "maximum.", "Energy", "discharge", "in", "six", "seconds.", "Warp", "reactor", "core", "primary", "coolant", "failure.", "Fluctuate", "phaser", "resonance", "frequencies.", "Resistance", "is", "futile.", "Recommend", "we", "adjust", "shield", "harmonics", "to", "the", "upper", "EM", "band", "when", "proceeding.", "These", "appear", "to", "be", "some", "kind", "of", "power-wave-guide", "conduits", "which", "allow", "them", "to", "work", "collectively", "as", "they", "perform", "ship", "functions.", "Increase", "deflector", "modulation", "to", "upper", "frequency", "band."];
// // const wordsString = words.join(",");
// // console.log(wordsString.reduce);

const words = ["Deflector", "power", "at", "maximum.", "Energy", "discharge", "in", "six", "seconds.", "Warp", "reactor", "core", "primary", "coolant", "failure.", "Fluctuate", "phaser", "resonance", "frequencies.", "Resistance", "is", "futile.", "Recommend", "we", "adjust", "shield", "harmonics", "to", "the", "upper", "EM", "band", "when", "proceeding.", "These", "appear", "to", "be", "some", "kind", "of", "power-wave-guide", "conduits", "which", "allow", "them", "to", "work", "collectively", "as", "they", "perform", "ship", "functions.", "Increase", "deflector", "modulation", "to", "upper", "frequency", "band."];

let add = (text, currentValue) => text + ' ' + currentValue;

console.log(words.reduce(add));