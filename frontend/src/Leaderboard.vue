<template>
<div class="everything ">
  <div class="controls">
    <select v-model="sortBy" class="select">
      <option value="name">Name</option>
      <option value="city">City</option>
      <option value="score">Score</option>
    </select>
    <button class="button_left" @click ="regenerate()">Regenerate</button>
    <button class="button" @click="toggleDirection()">
      <span v-if="ascending">Ascending</span>
      <span v-else>Descending</span>
    </button>
  </div>
  <div>
    <ul>
      <li v-for="(player, index) in sortedList">
        <span class="rank">{{ index + 1 }}</span>
        <img :src="player.wappen" style="width: 32px;">
        <span class="text">{{ player.name }}</span>
        <span class="city">{{ player.city}}</span> 
        <span class="score">{{ player.score }}</span>
      </li>
    </ul>
  </div>  
</div>  
</template>

<script>
export default {
  data() {
    return{
      sortBy: 'score',
      ascending: true, 
      players: []
  }
},

mounted() {
    fetch('http://127.0.0.1:8000/api/players')
      .then(res => res.json())
      .then(data => {
        this.players = data;
      })
      .catch(err => console.error(err));
},

methods: {
  regenerate() {
    fetch('http://127.0.0.1:8000/api/players/regenerate')
    window.location.reload()
  }, 
  toggleDirection() {
    this.ascending = !this.ascending
  }
},

computed: {
  sortedList() {
    let list;
    if (this.sortBy === 'score') {
      list = [...this.players].sort((a, b) => b.score - a.score);
    } 
    else {
      list = [...this.players].sort((a, b) => a[this.sortBy].localeCompare(b[this.sortBy]));
    }
    return this.ascending ? list : list.reverse();
  }
}

} 
</script>


<style>
@font-face {
  font-family: "Chomsky";
  src: url("/public/Chomsky.woff2") format(woff2),
       
}
:root {
  --background: #979366ff;
  --text: #DBD7CEff;
  --text_city: #cecabf;
  --button: #DBD7CEff;
  --button_text: #C53929ff;
  --li: #3E1815ff;
  --score: #C53929ff;
  --font: Chomsky;
  --font_bold: Chomsky;
  --font_size: 15px;
  --font_weight: light;
}
body {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
  min-height: 100vh;
  margin: 0;
  padding: 20px;
  box-sizing: border-box;
  
}
div {
  width: 100%;
  max-width: 700px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-bottom: 20px;
}
ul {
  width: 100%;
  padding: 0;
  margin: 0;
}
li {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 5px 0;
  background: var(--li);
  border-radius: 8px;
  padding: 10px 15px;
  box-sizing: border-box;
  
}
.everything {
  transform: scale(1.6);
  transform-origin: top;
}
.controls {
  width: 100%;
  max-width: 700px;
  display: flex;
  flex-wrap: wrap; 
  justify-content: start;
  margin-bottom: 1px;
  transform: translateX(-4px);
}

.button, .select {
  padding: 6px 12px;
  font-size: 16px;
  height: 40px;
  line-height: 1.2;
  box-sizing: border-box;
  border-radius: 4px;
  cursor: pointer;
  font-family: var(--font);
  background: var(--button);
  color: var(--button_text);
  border: none;
  margin: 4px;
}
.button_left {
  transform: translateX(+600px); 
  position: absolute;
  padding: 6px 12px;
  font-size: 16px;
  height: 40px;
  line-height: 1.2;
  box-sizing: border-box;
  border-radius: 4px;
  cursor: pointer;
  font-family: var(--font);
  background: var(--button);
  color: var(--button_text);
  border: none;
  margin: 4px;
}
.rank {
  width: 20px;
  text-align: center;
  margin-right: 10px;
  font-size: var(--font_size);
  font-family: var(--font);
  color: var(--score);
}
.text {
  flex: 2;
  text-align: left;
  font-family: var(--font_bold);
  margin-left: 4px;
  font-size: 20px;
  color: var(--text);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.city {
  flex: 1;
  text-align: left;
  font-family: var(--font);
  margin-right: 10px;
  font-size: var(--font_size);
  color: var(--text_city);
  white-space: nowrap;
  transform: translateX(-50px);
}
.score {
  width: 50px;
  text-align: right;
  font-family: var(--font_bold);
  font-weight: bold;
  font-size: 13px;
  color: var(--score);
}
</style>