<template>
  <div>
    <p>{{ player }} - {{ score }}</p>
    <button @click="score++">Increase score</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      player: 'Martin Siebert',
      score: 0
    }
  }
}
</script>
