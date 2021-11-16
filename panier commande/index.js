function total()
{
    var course1_prix=parseFloat(document.getElementById("course1").value);
    var course2_prix=parseFloat(document.getElementById("course2").value);
    var course3_prix=parseFloat(document.getElementById("course3").value);
    var  total;
    var totalvalue=document.getElementById("total");

    
    total=course1_prix+course2_prix+course3_prix;
    totalvalue.innerHTML="Total : $"+total;
    
return total;



}
total();
function removecourse2()
{
    var prix=document.getElementById("course2");

    var removecourse2=document.getElementById("course2remove");
    removecourse2.style.display="none";
    prix.value=0;
    

}
function removecourse1()
{
    var prix=document.getElementById("course1");
    var removecourse1=document.getElementById("course1remove");
    removecourse1.style.display="none";
    prix.value=0;

}
function removecourse3()
{
    var prix=document.getElementById("course3");
    var removecourse3=document.getElementById("course3remove");
    removecourse3.style.display="none";
    prix.value=0;

}
function emptycart()
{

    var m=document.getElementById("cour");
    var n=document.getElementById("pri");
    var ab=document.getElementById("pay");
    var me=document.getElementById("total");
    var msg=document.getElementById("emptycart");
    var nsg=document.getElementById("learnnow");
    var prixtotal=parseFloat(total());
    
    if(prixtotal==0)
    {
        msg.style.display="block";
        nsg.style.display="block";
        m.style.display="none";
        n.style.display="none";
        ab.style.display="none";
        me.style.display="none";


        
    }

}
emptycart();