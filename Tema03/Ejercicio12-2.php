his.patch&&0!==this.prerelease.length||this.major++,this.minor=0,this.patch=0,this.prerelease=[];break;case"minor":0===this.patch&&0!==this.prerelease.length||this.minor++,this.patch=0,this.prerelease=[];break;case"patch":0===this.prerelease.length&&this.patch++,this.prerelease=[];break;case"pre":if(0===this.prerelease.length)this.prerelease=[0];else{let e=this.prerelease.length;for(;--e>=0;)"number"==typeof this.prerelease[e]&&(this.prerelease[e]++,e=-2);-1===e&&this.prerelease.push(0)}t&&(this.prerelease[0]===t?isNaN(this.prerelease[1])&&(this.prerelease=[t,0]):this.prerelease=[t,0]);break;default:throw new Error("invalid increment argument: "+e)}return this.format(),this.raw=this.version,this}}e.exports=l},168:(e,t,n)=>{const r=n(663);e.exports=(e,t)=>{const n=r(e.trim().replace(/^[=v]+/,""),t);return n?n.version:null}},1128:(e,t,n)=>{const r=n(9348),i=n(3678),s=n(209),o=n(8758),a=n(6197),c=n(6768);e.exports=(e,t,n,l)=>{switch(t){case"===":return"object"==typeof e&&(e=e.version),"object"==typeof n&&(n=n.version),e===n;case"!==":return"object"==typeof e&&(e=e.version),"object"==typeof n&&(n=n.version),e!==n;case"":case"=":case"==":return r(e,n,l);case"!=":return i(e,n,l);case">":return s(e,n,l);case">=":return o(e,n,l);case"<":return a(e,n,l);case"<=":return c(e,n,l);default:throw new TypeError("Invalid operator: "+t)}}},1194:(e,t,n)=>{const r=n(5271),i=n(663),{re:s,t:o}=n(4841);e.exports=(e,t)=>{if(e instanceof r)return e;if("number"==typeof e&&(e=String(e)),"string"!=typeof e)return null;let n=null;if((t=t||{}).rtl){let t;for(;(t=s[o.COERCERTL].exec(e))&&(!n||n.index+n[0].length!==e.length);)n&&t.index+t[0].length===n.index+n[0].length||(n=t),s[o.COERCERTL].lastIndex=t.index+t[1].length+t[2].length;s[o.COERCERTL].lastIndex=-1}else n=e.match(s[o.COERCE]);return null===n?null:i(`${n[2]}.${n[3]||"0"}.${n[4]||"0"}`,t)}},6587:(e,t,n)=>{const r=n(5271);e.exports=(e,t,n)=>{const i=new r(e,n),s=new r(t,n);return i.compare(s)||i.compareBuild(s)}},3525:(e,t,n)=>{const r=n(3681);e.exports=(e,t)=>r(e,t,!0)},3681:(e,t,n)=>{const r=n(5271);e.exports=(e,t,n)=>new r(e,n).compare(new r(t,n))},6893:(e,t,n)=>{const r=n(663),i=n(9348);e.exports=(e,t)=>{if(i(e,t))return null;{const n=r(e),i=r(t),s=n.prerelease.length||i.prerelease.length,o=s?"pre":"",a=s?"prerelease":"";for(const e in n)if(("major"===e||"minor"===e||"patch"===e)&&n[e]!==i[e])return o+e;return a}}},9348:(e,t,n)=>{const r=n(3681);e.exports=(e,t,n)=>0===r(e,t,n)},209:(e,t,n)=>{const r=n(3681);e.exports=(e,t,n)=>r(e,t,n)>0},8758:(e,t,n)=>{const r=n(3681);e.exports=(e,t,n)=>r(e,t,n)>=0},8039:(e,t,n)=>{const r=n(5271);e.exports=(e,t,n,i)=>{"string"==typeof n&&(i=n,n=void 0);try{return new r(e,n).inc(t,i).version}catch(e){return null}}},6197:(e,t,n)=>{const r=n(3681);e.exports=(e,t,n)=>r(e,t,n)<0},6768:(e,t,n)=>{const r=n(3681);e.exports=(e,t,n)=>r(e,t,n)<=0},672:(e,t,n)=>{const r=n(5271);e.exports=(e,t)=>new r(e,t).major},895:(e,t,n)=>{const r=n(5271);e.exports=(e,t)=>new r(e,t).minor},3678:(e,t,n)=>{const r=n(3681);e.exports=(e,t,n)=>0!==r(e,t,n)},663:(e,t,n)=>{c