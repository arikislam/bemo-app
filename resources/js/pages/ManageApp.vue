<template>
  <div class="app__management">
    <h1>Manage my application</h1>

    <button class="download-button" @click="downLoadDump">Get Database Dump</button>
  </div>

</template>

<script>
import httpClient from "../client";

export default {
  name: "ManageApp",
  methods: {
    downLoadDump() {
     httpClient.post('dump-db').then(res => {
       const element = document.createElement('a');
       element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(res));
       element.setAttribute('download', 'dump.sql');
       element.style.display = 'none';
       document.body.appendChild(element);
       element.click();
       document.body.removeChild(element);
     }).catch(error => {
       console.log(error);
     });
    }
  }
}
</script>

<style scoped lang="scss">

.download-button {
  /* Style for your Add List button */
  cursor: pointer;
  background-color: #4CAF50; /* Example style */
  color: white;
  border: none;
  border-radius: 4px;
  padding: 8px 16px;
  margin: 20px 0;
  width: 100%;
}
</style>
