<?php
unset($argv[0]);
$arguments = $argv;
var_dump($arguments);
final class SitePackage
{
    private array $arguments;
    public string $typo3Version = '11005000';
    public string $basePackage = 'bootstrap_package';
    public string $title = 'project';
    public string $description = 'Project Configuration for Customer';
    public string $repositoryUrl = 'Project Configuration for Customer';
    public string $authorName = 'IwMedien';
    public string $authorEmail = 'programmierung@iwkoeln.de';
    public string $authorCompany = 'Iw Medien Gmbh';
    public string $authorHomepage = 'https://www.iwmedien.de';


    public function _construct(
        array $arguments
    ) {
        $this->arguments = $arguments;
    }

    /**
     * @param string $typo3Version
     */
    public function setTypo3Version(string $typo3Version): void
    {
        $this->typo3Version = self::getValueForProperty('t3', $this->arguments);
    }

    /**
     * @param string $basePackage
     */
    public function setBasePackage(string $basePackage): void
    {
        $this->basePackage = $basePackage;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $repositoryUrl
     */
    public function setRepositoryUrl(string $repositoryUrl): void
    {
        $this->repositoryUrl = $repositoryUrl;
    }

    /**
     * @param string $authorName
     */
    public function setAuthorName(string $authorName): void
    {
        $this->authorName = $authorName;
    }

    /**
     * @param string $authorEmail
     */
    public function setAuthorEmail(string $authorEmail): void
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @param string $authorCompany
     */
    public function setAuthorCompany(string $authorCompany): void
    {
        $this->authorCompany = $authorCompany;
    }

    /**
     * @param string $authorHomepage
     */
    public function setAuthorHomepage(string $authorHomepage): void
    {
        $this->authorHomepage = $authorHomepage;
    }

    private function getValueForProperty($property, $arrayWithValues) : string
    {

    }

}

$sitepackage = (new SitePackage($argv));
exit;
$data =  [
    'typo3_version' => '11005000',
    'base_package' => 'bootstrap_package',
    'title' => 'My Sitepackage',
    'description' => 'Project Configuration for Client',
    'repository_url' => 'https://github.com/benjaminkott/packagebuilder',
    'author' => [
        'name' => 'Benjamin Kott',
        'email' => 'contact@sitepackagebuilder.com',
        'company' => 'BK2K',
        'homepage' => 'https://www.sitepackagebuilder.com',
    ],
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.sitepackagebuilder.com/api/v1/sitepackage/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'application/json');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/plain',
    'Content-Length: ' . strlen(json_encode($data))
));
$output = curl_exec($ch);

file_put_contents('test.zip', $output);
