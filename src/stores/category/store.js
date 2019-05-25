import { writable } from "svelte/store";

export const category = writable([], function start(set) {
  fetch(process.env.SITE + "/wp-json/wp/v2/categories")
    .then(function(response) {
      return response.json();
    })
    .then(function(response) {
      set(response);
    });
});
