
const checkoxes = document.querySelectorAll('input[type="checkbox"]');

checkoxes.forEach(ch => {
    ch.onclick = function() {
        this.parentNode.submit();
    }
});
