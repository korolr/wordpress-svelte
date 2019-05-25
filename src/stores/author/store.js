import { writable } from "./node_modules/svelte/store";

export const author = writable([], function start(set) {
  fetch(process.env.SITE + "/wp-json/wp/v2/users/")
    .then(function(response) {
      return response.json();
    })
    .then(function(response) {
      set(response);
    });
});
