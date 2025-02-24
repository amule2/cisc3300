var one = 'First!';
first();
function first() {
    var two = 'Second!';
    second();
    function second() {
        var three = 'Third!';
        console.log(one + two + three);
    }
}
