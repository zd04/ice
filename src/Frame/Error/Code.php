<?php
namespace Ice\Frame\Error;
class Code {
    // 框架占用[100000 - 199999]区间的错误码
    // 框架通用层级错误
    const UNKNOWN     = 100100;
    const PHP_ERROR   = 100101;
    const PHP_WARN    = 100102;
    const UNKNOWN_URI = 100103;
    const ROUTE_ERROR = 100104;
    // WebService相关错误
    const WS_REQ_PARSE_ERROR     = 100200;
    const WS_REQ_PROTOCOL_ERROR  = 100201;
    const WS_REQ_VERSION_ERROR   = 100202;
    const WS_RESP_READ_ERROR     = 100220;
    const WS_RESP_PARSE_ERROR    = 100221;
    const WS_RESP_PROTOCOL_ERROR = 100223;
    const WS_RESP_VERSION_ERROR  = 100224;
    const WS_ERROR_RESPONSE      = 100240;
    // 资源管理器相关错误
    const R_ERROR_URI          = 100300;
    const R_ERROR_GET_NODE     = 100301;
    const R_ERROR_GET_CONN     = 100302;
    const R_ERROR_GET_ALL_CONN = 100303;
    const R_NO_CONNECTOR       = 100304;
    const R_NO_STRATEGY        = 100305;
    const R_NO_HANDLER         = 100306;
    // MYSQL 相关错误
    const MYSQL_CONN_ERROR           = 100400;
    const MYSQL_SET_CHARSET_FAILED   = 100401;
    const MYSQL_SET_COLLATION_FAILED = 100402;
    const MYSQL_QUERY_SQL_TOO_LONG   = 100403;
    const MYSQL_QUERY_WRITE_NO_WHERE = 100403;
}
