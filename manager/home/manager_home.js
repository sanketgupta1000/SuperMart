let add = document.getElementById("add");
let editbtns = document.getElementsByClassName("editbtn");
let deleteforms = document.getElementsByClassName("deleteform");
let backup; 


function toggleEdit()
{
    // console.log("Inside toggleEdit().")
    let productid = this.id.substr(4, this.id.length);
    
    let productcard = this.parentElement;
    let productinfo=productcard.querySelector(".productinfo");
    
    if(this.innerHTML=="Edit")
    {
        // console.log("Inside if statement.")
        backup = productinfo.cloneNode(true);
        this.innerHTML="Cancel";
        
        let name = productinfo.querySelector(".name");        
        let desc = productinfo.querySelector(".description");        
        let manu=productinfo.querySelector(".manufacturer");        
        let price=productinfo.querySelector(".price");        
        let qty=productinfo.querySelector(".quantity");

        let iname=document.createElement("input");
        iname.type="text";
        iname.name="name";
        iname.required=true;
        iname.value=name.innerHTML;
        iname.placeholder="Product Name";

        let idesc=document.createElement("input");
        idesc.type="text";
        idesc.name="description";
        idesc.required=true;
        idesc.value=desc.innerHTML;
        idesc.placeholder="Product Description";

        let imanu=document.createElement("input");
        imanu.type="text";
        imanu.name="manufacturer";
        imanu.required=true;
        imanu.value=manu.innerHTML.substr(3);
        imanu.placeholder="Product Manufacturer";

        let iprice=document.createElement("input");
        iprice.type="number";
        iprice.name="price";
        iprice.required=true;
        iprice.value=price.innerHTML.substr(7);
        iprice.placeholder="Product Price";

        let iqty=document.createElement("input");
        iqty.type="number";
        iqty.name="quantity";
        iqty.required=true;
        iqty.value=qty.innerHTML.substr(10);
        iqty.placeholder="Product Quantity";

        let id=document.createElement("input");
        id.type="hidden";
        id.name="id";
        id.value=`${productid}`;

        let submit=document.createElement("input");
        submit.type="submit";
        submit.value="Save";

        let form=document.createElement("form");
        form.action="/supermart/manager/crud/update.php";
        form.method="GET";

        name.replaceChildren(iname);
        desc.replaceChildren(idesc);
        manu.replaceChildren(imanu);
        price.replaceChildren(iprice);
        qty.replaceChildren(iqty);

        productinfo.append(id, submit);

        form.appendChild(productinfo);
        
        productcard.appendChild(form);
    }
    else
    {
        // console.log("Inside else statement.")
        productcard.replaceChild(backup, productcard.lastChild);
        this.innerHTML="Edit";
        // productcard.querySelector(".edit").addEventListener("click", toggleEdit);
    }
}

function toggleAdd()
{
    let container = document.querySelector(".container");

    if(add.innerHTML=="Add New Product")
    {
        add.innerHTML="Cancel";

        let newcard=document.createElement("div");
        newcard.className="product_card";
        newcard.id="productnew";

        let form=document.createElement("form");
        form.action="/supermart/manager/crud/new.php";
        form.method="GET";

        let info=document.createElement("div");
        info.className="productinfo";

        let iimage=document.createElement("input");
        iimage.type="text";
        iimage.name="image";
        iimage.required=true;
        iimage.placeholder="Path to Product Image";

        let iname=document.createElement("input");
        iname.type="text";
        iname.name="name";
        iname.required=true;
        iname.placeholder="Product Name";

        let idesc=document.createElement("input");
        idesc.type="text";
        idesc.name="description";
        idesc.required=true;
        idesc.placeholder="Product Description";

        let imanu=document.createElement("input");
        imanu.type="text";
        imanu.name="manufacturer";
        imanu.required=true;
        imanu.placeholder="Product Manufacturer";

        let iprice=document.createElement("input");
        iprice.type="number";
        iprice.name="price";
        iprice.required=true;
        iprice.placeholder="Product Price";

        let iqty=document.createElement("input");
        iqty.type="number";
        iqty.name="quantity";
        iqty.required=true;
        iqty.placeholder="Product Quantity";

        let submit=document.createElement("input");
        submit.type="submit";
        submit.value="Add";

        info.append(iimage, iname, idesc, imanu, iprice, iqty, submit);
        form.appendChild(info);
        newcard.appendChild(form);

        container.appendChild(newcard);
    }
    else
    {
        add.innerHTML="Add New Product";

        container.removeChild(container.lastChild);
    }
}

function confirmDelete()
{
    // console.log("inside confirmdelete");
    let id = this.id.substr(10);

    let inputid = document.createElement("input");
    inputid.type="hidden";
    inputid.name="id";
    inputid.value=id;

    this.appendChild(inputid);

    let pinfo = document.getElementById("product"+id).querySelector(".productinfo");

    let pname = pinfo.querySelector(".name").innerHTML;
    let pmanu = pinfo.querySelector(".manufacturer").innerHTML.substr(3);

    let consent = confirm("Do you really want to remove '"+pname+"' manufactured by '"+pmanu+"' from the inventory?");

    if(consent==false)
    {
        event.preventDefault();
        this.removeChild(inputid);
    }
}

add.addEventListener("click", toggleAdd);

for(e of editbtns)
{
    e.addEventListener("click", toggleEdit);
}

for(f of deleteforms)
{
    f.addEventListener("submit", confirmDelete);
}