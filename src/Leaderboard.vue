<template>
    <br>
    <button @click="toggleShow">
        <span v-if="!show">Show stuff</span>
        <span v-else>Hide stuff </span>
    </button>
    <div v-if="show">
        <div class="box" @mouseover="handleEvent($event, 67)">mouseover (enter)</div>
        <div class="box" @mouseleave="handleEvent">mouseleave</div>
        <div class="box" @dblclick="handleEvent">doubleclick</div>
        <div class="box" @mousemove="handleMouseMove">position {{ x }} || {{ y }}</div>
        <div v-show="show">
        <p>{{ player }} || {{ score }}</p>
        <button @click="score++">Increase score</button>
        <button @click="score--">Decrease score</button>
        </div>
    </div>
    
    
</template>

<script>
export default {
  data() {
    return {
      player: 'Martin Siebert',
      score: 0,
      show: false,
      x: 0,
      y: 0,
    }
},
methods: {
    toggleShow() {
        this.show = !this.show
    },
    handleEvent(e, data) {
        console.log(e, e.type)
        if (data)
        console.log(data)
    },
    handleMouseMove(e) {
        this.x = e.offsetX
        this.y = e.offsetY
    }
    }
}
</script>

<style>
.box {
  padding: 100px 0;
  width: 400px;
  text-align: center;
  display: inline-block;
  margin: 20px;
  background: #c5c5c5;
  border-radius: 8px;            
}</style>
