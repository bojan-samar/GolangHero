import{D as m,j as p,o as d,c as u,w as i,a as s,s as _,t as f,b,g,n as h}from"./app.94a9d194.js";import{_ as y}from"./AppLayout.6fbf3d37.js";import{_ as S}from"./PrimaryButton.bb8ee9ff.js";import"./Banner.d9db3160.js";const x={class:"py-12 max-w-4xl mx-auto"},v=["onSubmit"],C=s("h1",{class:"text-center font-bold text-lg mb-4"},"Checkout",-1),w=s("div",null,"Total: $99.99",-1),j=s("div",{id:"payment-element",class:"mt-5"},null,-1),V={__name:"Index",props:{clientSecret:String,stripeKey:String,returnUrl:String,job:Object},setup(o){const r=o,e=m({stripe:null,elements:null,processing:!1}),a=()=>{e.stripe=Stripe(r.stripeKey);const t={clientSecret:r.clientSecret};return e.elements=e.stripe.elements(t),e.elements.create("payment").mount("#payment-element"),null},c=async()=>{e.processing=!0;const t=e.elements,{error:n}=await e.stripe.confirmPayment({elements:t,confirmParams:{return_url:r.returnUrl}});if(n){e.processing=!1;const l=document.querySelector("#error-message");l.textContent=n.message}};return p(()=>{let t=document.createElement("script");t.setAttribute("src","https://js.stripe.com/v3/"),document.head.appendChild(t),t.onload=function(){a()}}),(t,n)=>(d(),u(y,{title:"Checkout"},{default:i(()=>[s("div",x,[s("form",{onSubmit:_(c,["prevent"]),id:"payment-form",class:"card bg-white","data-secret":""},[C,s("div",null,[s("div",null,"Job: "+f(o.job.title),1),w]),j,b(S,{id:"submit",class:h(["mt-5",{"opacity-25":e.processing}]),disabled:e.processing},{default:i(()=>[g("Submit")]),_:1},8,["class","disabled"])],40,v)])]),_:1}))}};export{V as default};
