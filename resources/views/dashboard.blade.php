<x-app-layout>
    <div class="uk-section">
        <div class="uk-container">
            <table class="uk-table uk-table-striped uk-table-middle">
                <thead>
                    <tr>
                        <th class="uk-table-shrink">Id</th>
                        <th>Table Heading</th>
                        <th>Table Heading</th>
                        <th>Table Heading</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i <= 20; $i++)
                        <tr>
                            <td class="uk-table-link"><a class="uk-link-reset" href="">{{ $i }}</a></td>
                            <td class="uk-table-link"><a class="uk-link-reset" href="">Table Data</a></td>
                            <td class="uk-table-link"><a class="uk-link-reset" href="">Lorem ipsum dolor sit.</a>
                            </td>
                            <td class="uk-table-link"><a class="uk-link-reset" href="">2022/20/10</a></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
