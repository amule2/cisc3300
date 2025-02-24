const cats= [
    {
        name: 'Charlie',
        adoptionStatus: 'available'
    },
    {
        name: 'Lily',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Coco',
        adoptionStatus: 'available'
    },
    {
        name: 'Oreo',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Luna',
        adoptionStatus: 'available'
    },
    {
        name: 'Milo',
        adoptionStatus: 'available'
    },
    {
        name: 'Lola',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Leo',
        adoptionStatus: 'available'
    },
    {
        name: 'Willow',
        adoptionStatus: 'available'
    },
    {
        name: 'Bella',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Max',
        adoptionStatus: 'available'
    },
    {
        name: 'Cleo',
        adoptionStatus: 'available'
    },
    {
        name: 'Lucy',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Daisy',
        adoptionStatus: 'available'
    },
];

// 6.
const catsAdopted= cats
    .filter(cat => cat.adoptionStatus === 'available')
    .map(cat => cat.name);

const catSentence= catsAdopted.length>0
    ? `You adopted: ${catsAdopted.join(', ')}.`
    : 'No cats.';

console.log(catSentence);

// 7.
const ranNumber= Math.random()*10;
const numMessage = ranNumber > 5 ? "greater than five!" : "less than five!";
console.log('Random Number: ', ranNumber);
console.log(numMessage);

// 8.
cats.forEach(cat => {
    console.log(`Name: ${cat.name}`);
    console.log(`Status: ${cat.adoptionStatus}`);
})

//9.
//first
if (1 =='1'){
    console.log("Equal");
}
//second
if (1==='1'){
    console.log("equal");
} else{
    console.log("not equal");
}

//10.
const catsWithCute= cats.map(cat => cat.name+ " is cute!");
console.log(catsWithCute);