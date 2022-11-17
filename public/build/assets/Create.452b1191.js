import{u as y,o as d,c as V,w as n,a as t,b as l,g as p,h as s,L as b,s as x,p as m,P as c,Q as _,e as f,i as k,F as q,n as U,t as h}from"./app.94a9d194.js";import{_ as S}from"./AdminLayout.d4efa737.js";import{_ as $}from"./PrimaryButton.bb8ee9ff.js";import{_ as B}from"./SecondaryButton.18b83dce.js";import{_ as u,a as i}from"./TextInput.fcebccd5.js";import{_ as r}from"./InputLabel.0d3b24b5.js";import{_ as C}from"./Checkbox.63f44637.js";import"./Banner.d9db3160.js";const M={class:"max-w-4xl mx-auto"},D={class:"max-w-4xl mx-auto"},L=["onSubmit"],N={class:"grid md:grid-cols-2 gap-6"},P={class:"mt-6"},T={class:"mt-6"},F={class:"mt-6"},A={class:"grid md:grid-cols-4 gap-6 mt-6"},E=t("option",{value:""},"All",-1),O=t("option",{value:"bus"},"Party Bus",-1),W=t("option",{value:"limo"},"Limo",-1),j=[E,O,W],z={class:"mt-6"},I={class:"mt-6"},Q={class:"grid md:grid-cols-2 gap-6 mt-6"},G=["value"],H={class:"flex items-center"},J=t("span",{class:"ml-2 text-sm text-gray-600"},"Active",-1),K={class:"mt-8"},ae={__name:"Create",props:{companies:Object},setup(g){const e=y({name:null,slug:null,meta:null,title:null,description:null,owner_website:null,price:0,price_weekend:0,capacity:0,images:null,type:null,status:!1,company_uuid:null}),v=()=>{e.post(route("admin.vehicle.store"),{preserveState:!0})};return(w,o)=>(d(),V(S,{title:"Vehicle Edit"},{default:n(()=>[t("section",M,[l(s(b),{href:w.route("admin.vehicle.index")},{default:n(()=>[l(B,null,{default:n(()=>[p("Back")]),_:1})]),_:1},8,["href"])]),t("section",D,[t("form",{onSubmit:x(v,["prevent"]),class:"mt-8 bg-white p-4 shadow rounded-lg"},[t("div",N,[t("div",null,[l(r,{for:"name",value:"Name",required:"true"}),l(u,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:s(e).name,"onUpdate:modelValue":o[0]||(o[0]=a=>s(e).name=a),required:"",autofocus:""},null,8,["modelValue"]),l(i,{message:s(e).errors.name,class:"mt-2"},null,8,["message"])]),t("div",null,[l(r,{for:"slug",value:"Slug",required:"true"}),l(u,{id:"slug",type:"text",class:"mt-1 block w-full",modelValue:s(e).slug,"onUpdate:modelValue":o[1]||(o[1]=a=>s(e).slug=a),required:""},null,8,["modelValue"]),l(i,{message:s(e).errors.slug,class:"mt-2"},null,8,["message"])])]),t("div",P,[l(r,{for:"title",value:"Meta Title",required:"true"}),l(u,{id:"title",type:"text",class:"mt-1 block w-full",modelValue:s(e).title,"onUpdate:modelValue":o[2]||(o[2]=a=>s(e).title=a),required:""},null,8,["modelValue"]),l(i,{message:s(e).errors.title,class:"mt-2"},null,8,["message"])]),t("div",T,[l(r,{for:"meta",value:"Meta Description",required:"true"}),m(t("textarea",{rows:"3",id:"meta",type:"text",class:"mt-1 block w-full form-input","onUpdate:modelValue":o[3]||(o[3]=a=>s(e).meta=a)},null,512),[[c,s(e).meta]]),l(i,{message:s(e).errors.meta,class:"mt-2"},null,8,["message"])]),t("div",F,[l(r,{for:"description",value:"Description",required:"true"}),m(t("textarea",{rows:"5",id:"description",type:"text",class:"mt-1 block w-full form-input","onUpdate:modelValue":o[4]||(o[4]=a=>s(e).description=a)},null,512),[[c,s(e).description]]),l(i,{message:s(e).errors.description,class:"mt-2"},null,8,["message"])]),t("div",A,[t("div",null,[l(r,{for:"price",value:"Price",required:"true"}),l(u,{id:"price",type:"text",class:"mt-1 block w-full",modelValue:s(e).price,"onUpdate:modelValue":o[5]||(o[5]=a=>s(e).price=a),required:""},null,8,["modelValue"]),l(i,{message:s(e).errors.price,class:"mt-2"},null,8,["message"])]),t("div",null,[l(r,{for:"price_weekend",value:"Price Weekend",required:"true"}),l(u,{id:"price_weekend",type:"text",class:"mt-1 block w-full",modelValue:s(e).price_weekend,"onUpdate:modelValue":o[6]||(o[6]=a=>s(e).price_weekend=a),required:""},null,8,["modelValue"]),l(i,{message:s(e).errors.price_weekend,class:"mt-2"},null,8,["message"])]),t("div",null,[l(r,{for:"capacity",value:"Capacity",required:"true"}),l(u,{id:"capacity",type:"text",class:"mt-1 block w-full",modelValue:s(e).capacity,"onUpdate:modelValue":o[7]||(o[7]=a=>s(e).capacity=a),required:""},null,8,["modelValue"]),l(i,{message:s(e).errors.capacity,class:"mt-2"},null,8,["message"])]),t("div",null,[l(r,{for:"type",value:"Type",required:"true"}),m(t("select",{id:"type","onUpdate:modelValue":o[8]||(o[8]=a=>s(e).type=a),class:"form-input mt-1 w-full",required:""},j,512),[[_,s(e).type]]),l(i,{message:s(e).errors.type,class:"mt-2"},null,8,["message"])])]),t("div",z,[l(r,{for:"images",value:"Images"}),m(t("textarea",{rows:"3",id:"images",type:"text",class:"mt-1 block w-full form-input","onUpdate:modelValue":o[9]||(o[9]=a=>s(e).images=a)},null,512),[[c,s(e).images]]),l(i,{message:s(e).errors.images,class:"mt-2"},null,8,["message"])]),t("div",I,[l(r,{for:"owner_website",value:"Owner Website"}),l(u,{id:"owner_website",type:"text",class:"mt-1 block w-full",modelValue:s(e).owner_website,"onUpdate:modelValue":o[10]||(o[10]=a=>s(e).owner_website=a)},null,8,["modelValue"]),l(i,{message:s(e).errors.owner_website,class:"mt-2"},null,8,["message"])]),t("div",Q,[t("div",null,[l(r,{for:"company_uuid",value:"Company"}),m(t("select",{name:"company_uuid",id:"company_uuid","onUpdate:modelValue":o[11]||(o[11]=a=>s(e).company_uuid=a),class:"form-input mt-1"},[(d(!0),f(q,null,k(g.companies,a=>(d(),f("option",{value:a.uuid},h(a.name),9,G))),256))],512),[[_,s(e).company_uuid]]),l(i,{message:s(e).errors.company_uuid,class:"mt-2"},null,8,["message"])]),t("label",H,[l(C,{name:"remember",checked:s(e).status,"onUpdate:checked":o[12]||(o[12]=a=>s(e).status=a)},null,8,["checked"]),J])]),t("div",K,[l($,{class:U({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:n(()=>[p(" Save ")]),_:1},8,["class","disabled"])])],40,L)])]),_:1}))}};export{ae as default};
