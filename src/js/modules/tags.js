const tags = () => {

    const url = new URL(document.location); // URLを取得
    const params = url.searchParams; // すべてのパラメータを取得
    const tag = params.get('tag'); // tagパラメータを取得
    const tagListElem = document.querySelector("#tag-list");

    if (tag) {
        tagListElem.scrollIntoView();
    }
};

export default tags