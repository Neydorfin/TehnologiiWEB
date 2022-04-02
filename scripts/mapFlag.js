const fTitle = document.querySelector('.flag_title');
const stats = document.querySelectorAll('.stats');

stats.forEach(stat =>{
    stat.addEventListener('mousemove', function (e){
        fTitle.querySelector('.flags').setAttribute('src', this.dataset.photo);
        fTitle.querySelector('.fTitle').innerHTML = this.dataset.title;
        fTitle.style.top =(e.y+20) + 'px';
        fTitle.style.left =(e.x+20) + 'px';
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            fTitle.style.top =(e.y + 20 + document.documentElement.scrollTop) + 'px';
        }
        if (e.y > 680) {
            fTitle.style.top =(e.y - 150 + document.documentElement.scrollTop) + 'px';
        }
        if (e.x > 1000) {
            fTitle.style.left =(e.x - 120) + 'px';
        }
        console.log(e.y);
    })

    stat.addEventListener('mouseenter',function (){
        fTitle.style.display = 'block';
    })

    stat.addEventListener('mouseleave',function (){
        fTitle.style.display = 'none';
    })
})