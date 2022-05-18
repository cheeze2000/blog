module ApplicationHelper
  def generate_meta_tags(title:, description:, url:)
    return "<meta name='description' content='#{description}'>
            <meta name='theme-color' content='#3b5249'>
            <meta property='og:description' content='#{description}'>
            <meta property='og:title' content='#{title}'>
            <meta property='og:type' content='website'>
            <meta property='og:url' content='#{url}'>
            <title>#{title}</title>"
  end
end
