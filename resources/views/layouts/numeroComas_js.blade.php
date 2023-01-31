function numberWithCommas(x)
{
  if(typeof x != "undefined")
  {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
}
