//TODOS:
// Add db fields for options/settings, status (published/draft/archive), colors
// Add ability to edit and delete
var data = JSON.parse(document.getElementById('data').innerHTML); // can this come straght form database? YES. need to create table field for options/settings
                                                                //   also one for 
console.log(data);

function createPromoBar(target='header', placement="before") {
    console.log(target);
    console.log(placement);
    var promo_bar = document.createElement("div");       // Create a promo bar node
    var textnode = document.createTextNode('{{$announcement->content}}');  // Create a text node for the message
    promo_bar.appendChild(textnode);                    // Append the text to <li>

    if(target=="footer") {
        var footer = document.querySelector("footer");

        // should be no option for before in UI
        if(placement=='before'){
            footer.after(promo_bar);  
        } else if(placement=='after'){
            footer.after(promo_bar);  
        }else {
            footer.after(promo_bar);  
        }
        
    } else {
        var header = document.getElementById("shopify-section-header");    

        if(placement=='before'){
            header.before(promo_bar);  
        } else if(placement=='after'){
            header.after(promo_bar); 
        }else {
            header.before(promo_bar); 
        }
    }


    // Styles
    promo_bar.style.cssText = "background-color: #333; color: #fff; border: 1px solid black; text-align: center; height: 50px; display: flex; align-items: center; justify-content: center;"; 
}

createPromoBar("header", "before");


