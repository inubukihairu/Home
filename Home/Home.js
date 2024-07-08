
/*
処理内容：経過日数表示
*/
//現在の時間
let nowDate = new Date();
//開始日数
const firstDate = new Date(2021, 6, 16, 0, 0, 0, 0);

//経過日数
let progress = 
{
     year:nowDate.getFullYear() - firstDate.getFullYear(),
    //0月から始まるため
    month:nowDate.getMonth() - firstDate.getMonth() + 1,
    date:nowDate.getDate() - firstDate.getDate()
} 

//経過日数のハンドラー
const handler = 
{
    get:(progress, property, receiver) => {
        //n周年記念日
        if(progress.month == 0 && progress.date == 0) {
            return `本日で${progress.year}周年です!`;
        } else {
            return progress[property] + "年目";
        }
    }
}
    
//経過日数のプロキシー
let middle = new Proxy(progress, handler);
//表示する文字列
let firstTime =  firstDate.getFullYear() + "/" + firstDate.getMonth() + "/" + firstDate.getDate();