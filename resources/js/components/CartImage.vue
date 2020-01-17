<template>  
      <div class="col-3">
        <img :src="image_url" style="width:100px" />
      </div>      
</template>
<script>
export default {
  props: ["image_url"]
};
</script>