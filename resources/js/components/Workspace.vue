<template>
    <div class="workspace">
        <img v-if="imageUrl" :src="imageUrl" alt="Uploaded Image">
        <div v-else class="placeholder">Drop Your Images Here</div>
    </div>
</template>

<script>
export default {
    props: {
        imageUrl: String // Receive image URL as prop
    }
}
</script>

<style scoped>
.workspace {
    width: 600px;
    height: 400px;
    border: 2px dashed #ccc;
    position: relative;
    background-color: #f0f0f0;
    margin: 10px 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #333;
    font-size: 20px;
}
img{
    width: 100%;
    height: 100%;
}
.placeholder {
    font-weight: bold;
    opacity: 0.5;
}

</style>
