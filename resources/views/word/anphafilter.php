<div ng-app="app">
    <div ng-controller="WordCtrl as word">
        <input type="text" ng-model="letter" placeholder="Enter a letter to filter">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Word</th>
                            </tr>
                        </thead>
                        <ul>
                            <tbody id="list">
                                <tr>
                                    <td>
                                        <li ng-repeat="word in word.words | startsWithLetter:letter">{{ word.id }}
                                        </li>
                                    </td>
                                    <td>
                                        <li ng-repeat="word in word.words | startsWithLetter:letter">
                                            {{ word.content }}
                                        </li>
                                    </td>
                                </tr>
                            </tbody>
                        </ul>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
