<template>
  <br><br><br><br><br><br><br><br><br><br><br>
<div>
  <ul>
    <li v-for="player in players">
      <img :src="player.wappen" style="width: 32px;">
      <span class="text">{{ player.name }}</span>
      <span class="city">{{ player.city}}</span> 
      <span class="score">{{ player.score }}</span>
    </li>
  </ul>
</div>  
</template>

<script>
import { computed } from 'vue';

function generateScore(max) {
  return Math.floor(Math.random() * max);
}
function generateWappen(max) {
  const wappen = Math.floor(Math.random() * max) + 1;
  return `./Wappen${wappen}.png`
}

export default {
  data() {
    return{
      players: [
      {name: "Lothar Eisenwald", city: "Frankfurt", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Alrik Falkenbruch", city: "Stuttgart", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Gerwig Bärenhardt", city: "München", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Isolde Finsterwald", city: "Hamburg", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Brunhild Steinrufer", city: "Köln", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Eldric Dornhammer", city: "Leipzig", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Hagen Blutmund", city: "Düsseldorf", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Maeve Silberhain", city: "Dortmund", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Thorben Nebelstein", city: "Dresden", score: generateScore(1111), wappen: generateWappen(5)},
      {name: "Elara Waldheim", city: "Hannover", score: generateScore(1111), wappen: generateWappen(5)}
    ]
  }
},

methods: {
  regenerateScore(max) {
    this.players.forEach(player => {
      player.score = generateScore(max);
    })
  },
},

computed: {
  sortedList() {
    return this.players.filter((player) => player.isFav)
  }
}

} 
</script>

<style>
body {
  max-width: 500px;
  margin: 20px auto;
  transform: scale(1.5);
}
p, h3, ul {
  padding: 0px;
  margin: 0px;
}
li {
  display: flex;
  align-items: center;
  margin: 5px auto;
  background: #c9c9c9;
  border-radius: 8px;
  padding: 10px 20px;
}
.button {
  margin-left: 0px;
  margin-right: 4px;
  padding: 6px 12px;
  font-family: monospace;
  background: #444;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.text {
    text-align: left;
    flex: 1;
    font-family: monospace, bold;
    margin-left: 4px;
    white-space: nowrap;
    font-weight: 700;
    font-size: 13px;
    color: #222;
    overflow: hidden;
    text-overflow: ellipsis;
}
.city {
    text-align: left;
    flex: 1;
    font-family: monospace;
    margin-left: 20px;
}
.score {
  width: 80px;
  text-align: right;
  font-family: monospace, bold;
  font-weight: 700;
    font-size: 13px;
}
li.fav {
  background: rgb(255, 179, 125);
  cursor: pointer;
}
</style>