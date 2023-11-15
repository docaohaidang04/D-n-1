/* function changeImage(sw) {
    const banner = document.querySelector('.banner');
    const images = document.querySelectorAll('.banner img');

    const activeImage = document.querySelector('.banner img.active');
    const nextImage = images[sw];

    activeImage.classList.remove('active');
    nextImage.classList.add('active');

    banner.classList.add('transitioning');
    setTimeout(() => {
        banner.classList.remove('transitioning');
        nextImage.classList.add('next');
    }, 50);
    var pic;
        if (sw == 0) {
          pic = "../layout/img/banner.jpg"
        }if(sw == 1){
          pic = "../layout/img/banner4.jpg"
          
        } else {
            pic = "../layout/img/banner3.jpg"
            }
        document.getElementById('myImage').src = pic;
} */

function changeImage(sw) {
        var pic;
        if (sw == 0) {
          pic = "../layout/img/banner.jpg"
        }if(sw == 1){
          pic = "../layout/img/banner4.jpg"
          
        } else {
            pic = "../layout/img/banner3.jpg"
            }
        document.getElementById('myImage').src = pic;
      }