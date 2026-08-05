if ("serviceWorker" in navigator) {
  window.addEventListener("load", () => {
    navigator.serviceWorker.register("/wp-content/themes/itsupportbee/sw.js");
  });
}
