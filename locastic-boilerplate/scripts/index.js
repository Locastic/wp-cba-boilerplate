import "../styles/index.sss";

console.log("Import global scripts");


// apply styleguide styles
if (window.top!=window.self){
    console.log(window.top);
    document.body.classList.add("pattern-lab");

    const patterns = ["layouts", "views", "global", "components"];
    // DORADIT 
    // patterns.forEach((pattern)=>{
        
    //     let url = window.top.document.baseURI;

    //     if(url.includes(pattern)){
    //         document.body.classList.add("pattern-lab--"+pattern);

    //     };

    // })

       


}
