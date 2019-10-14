/**
 * Convert a weight or mass to grams.
 *
 * @param weight The weight or mass to be converted.
 * @param units The abbreviation for the units in which this weight/mass is measured. Acceptable values: "lbs", "oz", "g", "kg', "mg".
 * @returns The mass in grams.
 */
function weightConverter(weight, units) {

	if(units.toLowerCase() === "lbs"){
		weight = weight * 453.592;
	} else if (units.toLowerCase() === "oz") {
		weight = weight * 28.3495;
	}else if (units.toLowerCase() === "kg") {
		weight = weight * 1000;
	}else if (units.toLowerCase() === "mg") {
		weight = weight / 1000;
	}

	return weight;
}
