let checkboxes=document.getElementsByClassName("cartadd");
let cartqtys=document.getElementsByClassName("iqty");

function toggleCart()
{
    let id=this.id.substring(7);
    let productcard=document.getElementById("product"+id);

    if(this.checked)
    {
        let iqty=document.createElement("input");
        iqty.type="number";
        iqty.value="1";
        iqty.className="iqty";
        iqty.id="iqty"+id;
        iqty.addEventListener("change", updateCookies);

        let idiv=document.createElement("div");
        idiv.className="idiv";
        idiv.id="idiv"+id;
        idiv.textContent="Quantity : ";

        idiv.appendChild(iqty);

        productcard.appendChild(idiv);

        document.cookie=id+"=1; path=/; expires=Fri, 31 Dec 9999 21:10:10 GMT";
    }
    else
    {
        let idiv=productcard.querySelector(".idiv");
        productcard.removeChild(idiv);
        document.cookie=id+"=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    }
}

function updateCookies()
{
    // console.log(this);
    if(this.id)
    {
        let id=this.id.substring(4);
        let newqty=this.value;
        let maxqty=document.getElementById("product"+id).querySelector(".quantity").innerHTML.substring(20);

        if(Number(newqty)<1)
        {
            newqty=1;
            this.value='1';
        }
        else if(Number(newqty)>Number(maxqty))
        {
            newqty=maxqty;
            this.value=maxqty;
        }

        document.cookie=id+"="+newqty+"; path=/; expires=Fri, 31 Dec 9999 21:10:10 GMT";

        // console.log("inside if in updateCookies");
    }
    // console.log("outside if in updateCookies");
}

for(c of checkboxes)
{
    c.addEventListener("click", toggleCart);
}

for(c of cartqtys)
{
    c.addEventListener("change", updateCookies);
}