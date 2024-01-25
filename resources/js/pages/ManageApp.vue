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
     httpClient.post('dump-db').then(({data}) => {
       const blob = new Blob([data], { type: 'application/sql' });
       const url = window.URL.createObjectURL(blob);

       const a = document.createElement('a');
       a.style.display = 'none';
       a.href = url;
       a.download = 'dump.sql';
       document.body.appendChild(a);

       a.click();

       window.URL.revokeObjectURL(url);
       document.body.removeChild(a);
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
