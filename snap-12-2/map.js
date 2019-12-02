// const peopleIds = people.map(person => people.id);
// let array = ['Bob', 'Jim', 'Matt', 'Mary', 'Suzy', 'Sarah'];

const map = new Map(['Bob', 'Jim', 'Matt', 'Mary', 'Suzy', 'Sarah']);
Array.from(map);

const mapper = new Map([['Bob', 'a']['Jim', 'b']['Matt', 'c']['Mary', 'd']['Suzy', 'e']['Sarah', 'f']]);

Array.from(mapper.keys());