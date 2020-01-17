<template>
  <div class="col-12 row mt-3">
    <div class="col-3 offset-3 text-right">
      <img :src="image_url" :alt="name" />
    </div>
    <div class="col-3 text-left">
      <h1>{{name}}</h1>
      <p>
        <slot></slot>
      </p>
      <slot name="buynow_form"></slot>
    </div>
  </div>
</template>
<script>
export default {
  props: ["name", "price", "image_url", "save_url"]
};
</script>