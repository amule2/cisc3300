const hasPinecone = (str) => {
    return str.toLowerCase().includes('pinecone');
};

const sentences = [
    "The boy plays baseball",
    "My cat is named pinecone",
    "The girl plays hockey",
    "The pincone is prickly",
];

const results = sentences.filter(hasPinecone);
console.log("Sentences containing 'pinecone':", results);