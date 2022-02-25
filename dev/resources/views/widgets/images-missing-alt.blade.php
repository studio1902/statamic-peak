<div class="card p-0 overflow-hidden h-full">
    <div class="flex justify-between items-center pt-2 px-2">
        <h2>
            <div class="flex items-center">
                <div class="h-6 w-6 mr-1 text-grey-80">
                    @cp_svg('assets')
                </div>
                <span>{{ __('strings.widget_assets_title', ['container' => $container]) }}</span>
            </div>
        </h2>
    </div>
    <div class="content p-2">
        <p>
            {{ __('strings.widget_assets_explanation') }}
            {{ trans_choice('strings.widget_assets_count', $amount, ['amount' => $amount]) }}
        </p>
    </div>

    @if ($assets)
        <table tabindex="0" class="data-table">
            <tbody tabindex="0">
    @endif
    @forelse ($assets as $asset)
        <tr class="sortable-row outline-none" tabindex="0">
            <td>
                <div class="flex items-center">
                    <div class="little-dot mr-1 bg-red"></div>
                    <a href="{{ $asset['edit_url'] }}" aria-label="{{ __('strings.widget_assets_edit') }}">{{ $asset['basename'] }}</a>
                </div>
            </td>
            <td class="actions-column"></td>
        </tr>
    @empty
        <div class="content p-2">
            <p>{{ __('strings.widget_assets_done') }}</p>
        </div>
    @endforelse
    @if ($assets)
            </tbody>
        </table>
    @endif
</div>
