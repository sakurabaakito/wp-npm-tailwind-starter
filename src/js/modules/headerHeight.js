const headerHeight = () => {
    let height = $("#header").height();
    if(window.innerWidth < 768){
        $("#primary").css("padding-top", height);
    }
};

export default headerHeight