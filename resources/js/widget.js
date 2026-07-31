document
.getElementById(
"vertex-support-btn"
)
.addEventListener(
"click",
async function(){


let response =
await fetch(
"/vertex-support/sso",
{

method:"POST",

headers:
{

"X-CSRF-TOKEN":
document
.querySelector(
'meta[name="csrf-token"]'
)
.content

}

}
);



let data =
await response.json();



if(data.redirect_url)
{

window.open(
data.redirect_url,
"_blank"
);

}

else
{

alert(
data.error ??
"Support unavailable"
);

}


});