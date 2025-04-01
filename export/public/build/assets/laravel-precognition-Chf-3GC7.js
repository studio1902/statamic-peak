import{a as k,i as z,b as G,m as ee}from"./axios-CjxB0R_e.js";import{m as O,d as te,s as re,g as H,i as ne,o as N}from"./lodash-es-DNNVAn2D.js";let C=k.create(),_=(e,t)=>`${e.method}:${e.baseURL??t.defaults.baseURL??""}${e.url}`,I=e=>e.status===204&&e.headers["precognition-success"]==="true";const w={},v={get:(e,t={},s={})=>P(S("get",e,t,s)),post:(e,t={},s={})=>P(S("post",e,t,s)),patch:(e,t={},s={})=>P(S("patch",e,t,s)),put:(e,t={},s={})=>P(S("put",e,t,s)),delete:(e,t={},s={})=>P(S("delete",e,t,s)),use(e){return C=e,v},axios(){return C},fingerprintRequestsUsing(e){return _=e===null?()=>null:e,v},determineSuccessUsing(e){return I=e,v}},S=(e,t,s,i)=>({url:t,method:e,...i,...["get","delete"].includes(e)?{params:O({},s,i==null?void 0:i.params)}:{data:O({},s,i==null?void 0:i.data)}}),P=(e={})=>{const t=[se,ae,ie].reduce((s,i)=>i(s),e);return(t.onBefore??(()=>!0))()===!1?Promise.resolve(null):((t.onStart??(()=>null))(),C.request(t).then(async s=>{t.precognitive&&$(s);const i=s.status;let l=s;return t.precognitive&&t.onPrecognitionSuccess&&I(l)&&(l=await Promise.resolve(t.onPrecognitionSuccess(l)??l)),t.onSuccess&&oe(i)&&(l=await Promise.resolve(t.onSuccess(l)??l)),(M(t,i)??(d=>d))(l)??l},s=>le(s)?Promise.reject(s):(t.precognitive&&$(s.response),(M(t,s.response.status)??((l,E)=>Promise.reject(E)))(s.response,s))).finally(t.onFinish??(()=>null)))},se=e=>{const t=e.only??e.validate;return{...e,timeout:e.timeout??C.defaults.timeout??3e4,precognitive:e.precognitive!==!1,fingerprint:typeof e.fingerprint>"u"?_(e,C):e.fingerprint,headers:{...e.headers,"Content-Type":ue(e),...e.precognitive!==!1?{Precognition:!0}:{},...t?{"Precognition-Validate-Only":Array.from(t).join()}:{}}}},oe=e=>e>=200&&e<300,ae=e=>{var t;return typeof e.fingerprint!="string"||((t=w[e.fingerprint])==null||t.abort(),delete w[e.fingerprint]),e},ie=e=>typeof e.fingerprint!="string"||e.signal||e.cancelToken||!e.precognitive?e:(w[e.fingerprint]=new AbortController,{...e,signal:w[e.fingerprint].signal}),$=e=>{var t;if(((t=e.headers)==null?void 0:t.precognition)!=="true")throw Error("Did not receive a Precognition response. Ensure you have the Precognition middleware in place for the route.")},le=e=>{var t;return!G(e)||typeof((t=e.response)==null?void 0:t.status)!="number"||z(e)},M=(e,t)=>({401:e.onUnauthorized,403:e.onForbidden,404:e.onNotFound,409:e.onConflict,422:e.onValidationError,423:e.onLocked})[t],ue=e=>{var t,s,i;return((t=e.headers)==null?void 0:t["Content-Type"])??((s=e.headers)==null?void 0:s["Content-type"])??((i=e.headers)==null?void 0:i["content-type"])??(J(e.data)?"multipart/form-data":"application/json")},J=e=>D(e)||typeof e=="object"&&e!==null&&Object.values(e).some(t=>J(t)),D=e=>typeof File<"u"&&e instanceof File||e instanceof Blob||typeof FileList<"u"&&e instanceof FileList&&e.length>0,he=e=>typeof e=="string"?e:e(),fe=e=>typeof e=="string"?e.toLowerCase():e(),ve=(e,t={})=>{const s={errorsChanged:[],touchedChanged:[],validatingChanged:[],validatedChanged:[]};let i=!1,l=!1;const E=r=>r!==l?(l=r,s.validatingChanged):[];let d=[];const A=r=>{const n=[...new Set(r)];return d.length!==n.length||!n.every(o=>d.includes(o))?(d=n,s.validatedChanged):[]},K=()=>d.filter(r=>typeof h[r]>"u");let c=[];const g=r=>{const n=[...new Set(r)];return c.length!==n.length||!n.every(o=>c.includes(o))?(c=n,s.touchedChanged):[]};let h={};const F=r=>{const n=ce(r);return ne(h,n)?[]:(h=n,s.errorsChanged)},Q=r=>{const n={...h};return delete n[q(r)],F(n)},W=()=>Object.keys(h).length>0;let L=1500;const X=r=>{L=r,V.cancel(),V=x()};let j=t,T=null,U=[],R=null;const x=()=>te(r=>{e({get:(n,o={},a={})=>v.get(n,m(o),b(a,r,o)),post:(n,o={},a={})=>v.post(n,m(o),b(a,r,o)),patch:(n,o={},a={})=>v.patch(n,m(o),b(a,r,o)),put:(n,o={},a={})=>v.put(n,m(o),b(a,r,o)),delete:(n,o={},a={})=>v.delete(n,m(o),b(a,r,o))}).catch(n=>{var o;return z(n)||G(n)&&((o=n.response)==null?void 0:o.status)===422?null:Promise.reject(n)})},L,{leading:!0,trailing:!0});let V=x();const b=(r,n,o={})=>{const a={...r,...n},f=Array.from(a.only??a.validate??c);return{...n,...ee(r,n),only:f,timeout:a.timeout??5e3,onValidationError:(u,y)=>([...A([...d,...f]),...F(O(N({...h},f),u.data.errors))].forEach(Z=>Z()),a.onValidationError?a.onValidationError(u,y):Promise.reject(y)),onSuccess:u=>(A([...d,...f]).forEach(y=>y()),a.onSuccess?a.onSuccess(u):u),onPrecognitionSuccess:u=>([...A([...d,...f]),...F(N({...h},f))].forEach(y=>y()),a.onPrecognitionSuccess?a.onPrecognitionSuccess(u):u),onBefore:()=>a.onBeforeValidation&&a.onBeforeValidation({data:o,touched:c},{data:j,touched:U})===!1||(a.onBefore||(()=>!0))()===!1?!1:(R=c,T=o,!0),onStart:()=>{E(!0).forEach(u=>u()),(a.onStart??(()=>null))()},onFinish:()=>{E(!1).forEach(u=>u()),U=R,j=T,R=T=null,(a.onFinish??(()=>null))()}}},Y=(r,n,o)=>{if(typeof r>"u"){const a=Array.from((o==null?void 0:o.only)??(o==null?void 0:o.validate)??[]);g([...c,...a]).forEach(f=>f()),V(o??{});return}if(D(n)&&!i){console.warn('Precognition file validation is not active. Call the "validateFiles" function on your form to enable it.');return}r=q(r),H(j,r)!==n&&(g([r,...c]).forEach(a=>a()),V(o??{}))},m=r=>i===!1?B(r):r,p={touched:()=>c,validate(r,n,o){return typeof r=="object"&&!("target"in r)&&(o=r,r=n=void 0),Y(r,n,o),p},touch(r){const n=Array.isArray(r)?r:[q(r)];return g([...c,...n]).forEach(o=>o()),p},validating:()=>l,valid:K,errors:()=>h,hasErrors:W,setErrors(r){return F(r).forEach(n=>n()),p},forgetError(r){return Q(r).forEach(n=>n()),p},reset(...r){if(r.length===0)g([]).forEach(n=>n());else{const n=[...c];r.forEach(o=>{n.includes(o)&&n.splice(n.indexOf(o),1),re(j,o,H(t,o))}),g(n).forEach(o=>o())}return p},setTimeout(r){return X(r),p},on(r,n){return s[r].push(n),p},validateFiles(){return i=!0,p}};return p},ye=e=>Object.keys(e).reduce((t,s)=>({...t,[s]:Array.isArray(e[s])?e[s][0]:e[s]}),{}),ce=e=>Object.keys(e).reduce((t,s)=>({...t,[s]:typeof e[s]=="string"?[e[s]]:e[s]}),{}),q=e=>typeof e!="string"?e.target.name:e,B=e=>{const t={...e};return Object.keys(t).forEach(s=>{const i=t[s];if(i!==null){if(D(i)){delete t[s];return}if(Array.isArray(i)){t[s]=Object.values(B({...i}));return}if(typeof i=="object"){t[s]=B(t[s]);return}}}),t};export{fe as a,v as b,ve as c,q as d,he as r,ye as t};
