const button = document.querySelector("button");
const form = document.getElementById("form");

button.addEventListener("click", () => {
  const formData = new FormData(form);
  const action = "../app/trip_create.php";

  if (!formData.get("destination")) {
    alert("旅行先を入力してください");
    return;
  } else if (!formData.get("destination").length > 100) {
    alert("旅行先は100文字以内にしてください");
    return;
  }
  if (!formData.get("theme")) {
    alert("旅行のテーマを入力してください");
    return;
  }
  if (!formData.get("content")) {
    alert("感想を入力してください");
    return;
  }
  if (!formData.get("evaluation")) {
    alert("評価を選択してください");
    return;
  }
  if (!formData.get("companion")) {
    alert("誰とを選択してください");
    return;
  }
  if (!formData.get("tripDate")) {
    alert("旅行した日を選択してください");
    return;
  }
  if (!formData.get("region")) {
    alert("地域を選択してください");
    return;
  }

  const options = {
    method: "POST",
    body: formData,
  };

  fetch(action, options).then((e) => {
    if (e.status === 200) {
      alert("投稿しました。");
      location.href = "./list.php";
    } else {
      alert("投稿失敗");
    }
  });
});
