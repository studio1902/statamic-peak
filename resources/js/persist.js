// packages/persist/src/index.js
function src_default(Alpine) {
  Alpine.magic("persist", (el, {interceptor}) => {
    return interceptor((initialValue, getter, setter, path, key) => {
      let initial = localStorage.getItem(path) ? localStorage.getItem(path) : initialValue;
      setter(initialValue);
      Alpine.effect(() => {
        let value = getter();
        localStorage.setItem(path, value);
        setter(value);
      });
      return initial;
    });
  });
}

// packages/persist/builds/module.js
var module_default = src_default;
export {
  module_default as default
};
