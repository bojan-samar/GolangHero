import{u as b,o as n,e as c,b as t,h as s,w as m,F as h,H as k,t as x,f as u,a,c as y,g as d,L as f,n as v,s as V}from"./app.45498cd7.js";import{A as $}from"./AuthenticationCard.960b2aea.js";import{_ as B}from"./AuthenticationCardLogo.844e1d75.js";import{_ as F}from"./Checkbox.c695042f.js";import{_ as p,a as _}from"./TextInput.5ff55a5f.js";import{_ as g}from"./InputLabel.b1f8d18f.js";import{_ as L}from"./PrimaryButton.c9142c4e.js";import"./_plugin-vue_export-helper.cdc0426e.js";const N={key:0,class:"mb-4 font-medium text-sm text-green-600"},C=["onSubmit"],R={class:"mt-4"},S={class:"block mt-4"},q={class:"flex items-center"},A=a("span",{class:"ml-2 text-sm text-gray-600"},"Remember me",-1),P={class:"flex items-center justify-end mt-4"},U={class:"text-center mt-5"},I={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(i){const e=b({email:"",password:"",remember:!1}),w=()=>{e.transform(l=>({...l,remember:e.remember?"on":""})).post(route("login"),{onFinish:()=>e.reset("password")})};return(l,o)=>(n(),c(h,null,[t(s(k),{title:"Log in"}),t($,null,{logo:m(()=>[t(B)]),default:m(()=>[i.status?(n(),c("div",N,x(i.status),1)):u("",!0),a("form",{onSubmit:V(w,["prevent"])},[a("div",null,[t(g,{for:"email",value:"Email"}),t(p,{id:"email",modelValue:s(e).email,"onUpdate:modelValue":o[0]||(o[0]=r=>s(e).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:""},null,8,["modelValue"]),t(_,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),a("div",R,[t(g,{for:"password",value:"Password"}),t(p,{id:"password",modelValue:s(e).password,"onUpdate:modelValue":o[1]||(o[1]=r=>s(e).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(_,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),a("div",S,[a("label",q,[t(F,{checked:s(e).remember,"onUpdate:checked":o[2]||(o[2]=r=>s(e).remember=r),name:"remember"},null,8,["checked"]),A])]),a("div",P,[i.canResetPassword?(n(),y(s(f),{key:0,href:l.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:m(()=>[d(" Forgot your password? ")]),_:1},8,["href"])):u("",!0),t(L,{class:v(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:m(()=>[d(" Log in ")]),_:1},8,["class","disabled"])])],40,C),a("div",U,[t(s(f),{href:l.route("register")},{default:m(()=>[d("Register New Account")]),_:1},8,["href"])])]),_:1})],64))}};export{I as default};