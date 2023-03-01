<div class="circle">
  <div align="center">
    <div class="yin"></div>
  </div>
  <div align="right">
    <div class="feher"></div>
  </div>
  <div align="center">
    <div class="yang"></div>
  </div>
  
  <div align="center">
    <div class="p-black"></div>
    <div class="p-white"></div>
  </div>
</div>
<style>
.circle {
  width:300px;
  height:300px;
  background:black;
  border-radius:100%;
  text-align:center;
  animation:rotate 40000s infinite;
  margin:auto;
}
.circle .yin {
  width:150px;
  height:150px;
  background:white;
  border-radius:100%;
}

.circle .yang {
  width:150px;
  height:150px;
  background:black;
  border-radius:100%;
  margin-top:-154px;
  z-index:auto;
      position: absolute;
  margin-left:75px;

}

.feher {
  width:150px;
  height:300px;
  background:white;
  display:inline-block;
  margin-top:-150px;
  border-top-right-radius:150px;
    border-bottom-right-radius:150px;
}

.p-black {
  width:50px;
  height:50px;
  background:black;
  border-radius:100%;
  position:absolute;
  margin-top:-260px;
  margin-left:120px;
}

.p-white {
  width:50px;
  height:50px;
  background:white;
  border-radius:100%;
  position:absolute;
  margin-top:-110px;
  margin-left:120px;
}

@keyframes rotate {
  from {transform:rotate(0deg);}
  to {transform:rotate(-3600000deg);}
}
</style>