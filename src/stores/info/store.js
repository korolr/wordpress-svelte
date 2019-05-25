import { writable } from "svelte/store";

export const info = writable({}, function start(set) {
  fetch(process.env.SITE + "/wp-json/")
    .then(function(response) {
      return response.json();
    })
    .then(function(response) {
      set(response);
    });
});
