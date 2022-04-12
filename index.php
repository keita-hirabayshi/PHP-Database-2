<?php
/**
 * 例外処理
 *  * 1 例外処理が発生したとしても、try文に入れておけば、処理は最後まで実行される。（finally後に記載した処理は問題なく実行される。）
 * ２　　発生したエラーはどんどん上位のコードに遡っていき、tryのあるところで認識される。
 */

function throwException() {
    try {

        $bool = false;
        // $bool->method();
        new PDO('', '', '');
    
        echo '通常処理が最後まで実行されました。<br>';
    
    } catch(Throwable $e) {
    // catchに記載するハンドリングによって、取得するエラーの対象を絞ることができる。
    // エラーを見つけたい → throwable、PDOに関する限定的なエラーを見つけたい　→　PDOexeption
        echo 'PDOException<br>';
        echo '例外処理が実行されました。<br>';
        echo $e->getMessage() . '<br>';
        echo get_class($e) . '<br>';
    
    }
}

try {

    throwException();
    
    echo '通常処理が最後まで実行されました。<br>';

} catch(Error $e) {

    echo '例外処理が実行されました。<br>';
    echo $e->getMessage() . '<br>';
    echo get_class($e) . '<br>';

} finally {

    echo '終了処理が実行されました。<br>';

}

echo 'finallyの後です。';
