{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        responsive:{
            0:{
                items:1,
                nav:true,
            },
            600:{
                items:1,
                nav:true,
            },
            1000:{
                items:3
            }
        }
    })

    var dealine_day=new Date("{{$data->dealine_day}}").getTime();
    setInterval(function(){
       var now=new Date().getTime();
       var countDown=dealine_day-now;
       var hours=Math.floor(countDown/(1000*60*60));
       var minutes=Math.floor(countDown/(1000*60));
       minutes %=60;
       document.getElementsByClassName("hours")[0].innerText=hours;
       document.getElementsByClassName("minutes")[0].innerText=minutes;
        document.getElementsByClassName("hours")[1].innerText=hours;
        document.getElementsByClassName("minutes")[1].innerText=minutes;
    },1000);

    // favorite job
    var id={{$data->id}};
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    if(getCookie("job_favorite_"+id)!= ""){
        $(".job_favorite_"+id).css('background','transparent url("http://127.0.0.1:8000/css/client/detail/img/star_yellow.png") 50% 0% no-repeat padding-box')
    }
    function job_favorite(){
        if(getCookie("job_favorite_"+id)!= ""){
            document.cookie = "job_favorite_"+id+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }else{
            setCookie("job_favorite_"+id,id,0.00034722222);
        }
        if(getCookie("job_favorite_"+id)!= ""){
            $(".job_favorite_"+id).css('background','transparent url("http://127.0.0.1:8000/css/client/detail/img/star_yellow.png") 50% 0% no-repeat padding-box')
        }
        else {
            $(".job_favorite_"+id).css('background','transparent url("http://127.0.0.1:8000/css/client/detail/img/star.png") 50% 0% no-repeat padding-box')
        }
        console.log(getCookie("job_favorite_"+id));
    }

</script>
